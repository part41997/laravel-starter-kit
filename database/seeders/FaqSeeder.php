<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => "What does 'FAQ' stand for?",
                'answer' => "FAQ stands for 'Frequently Asked Questions.'",
            ],
            [
                'question' => 'Why are FAQs important?',
                'answer' => 'FAQs provide answers to common queries, saving time for both users and support staff. They help users find solutions to their problems quickly.',
            ],
            [
                'question' => 'How can I use FAQs effectively?',
                'answer' => 'Keep them concise and relevant. Organize them logically, and update them regularly to reflect any changes or new information.',
            ],
            [
                'question' => 'Where can I find FAQs?',
                'answer' => 'FAQs are often found on websites, product pages, support portals, or included in documentation.',
            ],
            [
                'question' => 'Are FAQs the same as a user manual?',
                'answer' => 'No, FAQs are typically shorter and focus on answering common questions, while user manuals provide comprehensive guidance on using a product or service.',
            ],
            [
                'question' => 'Can I suggest a question for the FAQs?',
                'answer' => 'Absolutely! If you have a question that you think should be included, feel free to submit it through the appropriate channel, such as a website contact form or support email.',
            ],
            [
                'question' => 'How often are FAQs updated?',
                'answer' => 'FAQs should be updated regularly to ensure they remain accurate and relevant. Major updates may coincide with product releases or policy changes.',
            ],
            [
                'question' => 'Are FAQs only for technical products?',
                'answer' => 'No, FAQs can cover a wide range of topics, including technical products, services, policies, and general information.',
            ],
            [
                'question' => "What should I do if I can't find the answer in the FAQs?",
                'answer' => "If you can't find the answer you're looking for, you can try reaching out to customer support for further assistance.",
            ],
            [
                'question' => 'Can I share FAQs with others?',
                'answer' => 'Yes, FAQs are often designed to be shared. Sharing them can help others who may have similar questions.',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }
    }
}
