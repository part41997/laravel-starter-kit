<?php

namespace App\Repositories;

use App\Models\Faq;

class FaqRepository
{
    /**
     * @var Faq
     */
    protected $faq;

    /**
     * FaqRepository constructor.
     *
     * @param Faq $faq
     */
    public function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }

    /**
     * Get all defaultModels.
     *
     * @return Faq $faq
     */
    public function getAll()
    {
        return $this->faq
            ->get();
    }

    /**
     * Get defaultModel by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->faq
            ->find($id);
    }

    /**
     * Save Faq
     *
     * @param $data
     * @return Faq
     */
    public function save($data)
    {
        $faq = new $this->faq;

        $faq = $faq->create([
            'question' => $data['question'] ?? '',
            'answer' => $data['answer'] ?? '',
        ]);

        return $faq->fresh();
    }

    /**
     * Update Faq
     *
     * @param $data
     * @return Faq
     */
    public function update($data, $id)
    {
        $faq = $this->faq->find($id);

        $faq->update([
            'question' => $data['question'] ?? '',
            'answer' => $data['answer'] ?? '',
        ]);

        return $faq;
    }

    /**
     * Update Faq
     *
     * @param $data
     * @return Faq
     */
    public function delete($id)
    {
        $faq = $this->faq->find($id);
        $faq->delete();

        return $faq;
    }
}
