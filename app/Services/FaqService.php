<?php

namespace App\Services;

use App\Repositories\FaqRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class FaqService
{
    /**
     * @var $faqRepository
     */
    protected $faqRepository;

    /**
     * RoofService constructor.
     *
     * @param FaqRepository $faqRepository
     */
    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    /**
     * Delete default by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $faq = $this->faqRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException(__('messages.unableToDelete'));
        }

        DB::commit();

        return $faq;

    }

    /**
     * Get all defaults.
     *
     * @return Object
     */
    public function getAll()
    {
        return $this->faqRepository->getAll();
    }

    /**
     * Get default by id.
     *
     * @param $id
     * @return Object
     */
    public function getById($id)
    {
        return $this->faqRepository->getById($id);
    }

    /**
     * Update roof data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update($data, $id)
    {
        DB::beginTransaction();

        try {
            $faq = $this->faqRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException(__('messages.unableToUpdate'));
        }

        DB::commit();

        return $faq;
    }

    /**
     *
     * @param array $data
     * @return String
     */
    public function save($data)
    {
        DB::beginTransaction();

        try {
            $faq = $this->faqRepository->save($data);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException(__('messages.unableToSave'));
        }

        DB::commit();
       
        return $faq;
    }
}