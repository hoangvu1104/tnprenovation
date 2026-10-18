<?php

class Recruitment
{
    public function getResponsibilities(): array
    {
        return [
            ['01', 'Nhà bếp', 'Thi công và lắp đặt tủ bếp, countertop và backsplash.'],
            ['02', 'Phòng tắm', 'Lắp đặt gạch, thiết bị vệ sinh và shower.'],
            ['03', 'Tường & sơn', 'Sửa chữa, hoàn thiện drywall và sơn tường.'],
            ['04', 'Sàn & nội thất', 'Thi công sàn vinyl, laminate, hardwood, gạch; lắp cửa, baseboard và moulding.'],
        ];
    }

    public function getBenefits(): array
    {
        return [
            'Mức lương tương xứng với năng lực, kinh nghiệm và chất lượng công việc.',
            'Tham gia các dự án renovation đa dạng để nâng cao tay nghề.',
            'Cơ hội phát triển lên thợ chính và trưởng nhóm thi công.',
            'Môi trường đoàn kết, hỗ trợ nhau và cơ hội gắn bó lâu dài.',
        ];
    }
}
