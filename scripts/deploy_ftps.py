"""Upload only website files using explicit FTPS; credentials come from Secrets."""

import argparse
import ftplib
import os
from pathlib import Path, PurePosixPath
import ssl
import sys


PROJECT_ROOT = Path(__file__).resolve().parent.parent


def get_deployment_files():
    files = []
    for name in [".htaccess", "favicon.svg", "app", "config", "views", "assets", "index.php"]:
        source = PROJECT_ROOT / name
        if not source.exists():
            raise ValueError("Missing deployment source: " + name)
        if source.is_file():
            files.append(source)
        else:
            for file in sorted(source.rglob("*")):
                if file.is_symlink():
                    raise ValueError("Symbolic links are not allowed in deployment files.")
                if file.is_file():
                    files.append(file)

    for file in files:
        if file.is_symlink() or file.name.startswith(".env"):
            raise ValueError("Unexpected deployment file.")
    return files


def required_setting(name):
    value = os.environ.get(name, "")
    if not value or "\r" in value or "\n" in value:
        raise ValueError("Missing or invalid GitHub Secret: " + name)
    return value


def ensure_directory(ftp, root_directory, relative_directory):
    # Start from the verified target for every file; never traverse above it.
    ftp.cwd(root_directory)
    for part in relative_directory.parts:
        if part in ("", "."):
            continue
        try:
            ftp.cwd(part)
        except ftplib.error_perm as error:
            if not str(error).startswith("550"):
                raise
            ftp.mkd(part)
            ftp.cwd(part)


def deploy(files):
    host = required_setting("FTP_HOST")
    username = required_setting("FTP_USERNAME")
    password = required_setting("FTP_PASSWORD")
    directory = required_setting("FTP_DIRECTORY")
    if ".." in PurePosixPath(directory).parts:
        raise ValueError("Deployment directory must not contain '..'.")

    context = ssl.create_default_context()
    with ftplib.FTP_TLS(context=context, timeout=60) as ftp:
        print("Connecting to FTPS server...", flush=True)
        ftp.connect(host, 21)
        print("Authenticating with verified TLS...", flush=True)
        ftp.login(username, password)
        ftp.prot_p()
        ftp.set_pasv(True)
        # Do not create the configured root: a typo must fail before any upload.
        ftp.cwd(directory)
        root_directory = ftp.pwd()
        print("FTPS login and target directory verified.", flush=True)
        for file in files:
            relative = PurePosixPath(file.relative_to(PROJECT_ROOT).as_posix())
            ensure_directory(ftp, root_directory, relative.parent)
            print("Uploading: " + relative.as_posix(), flush=True)
            with file.open("rb") as stream:
                ftp.storbinary("STOR " + relative.name, stream)
            print("Uploaded: " + relative.as_posix(), flush=True)
    print("Deployment upload complete.")


def main():
    parser = argparse.ArgumentParser()
    parser.add_argument("--check", action="store_true", help="Validate files without connecting.")
    arguments = parser.parse_args()
    files = get_deployment_files()
    print("Website files: " + str(len(files)))
    if not arguments.check:
        deploy(files)


if __name__ == "__main__":
    try:
        main()
    except Exception as error:
        # Avoid printing server replies or exception values that might contain credentials.
        if isinstance(error, ValueError):
            print(str(error), file=sys.stderr)
        else:
            print("Deployment failed (" + type(error).__name__ + "). Check FTPS settings and server access.", file=sys.stderr)
        sys.exit(1)
