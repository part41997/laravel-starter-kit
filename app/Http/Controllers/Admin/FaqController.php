<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FaqDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFaq;
use App\Models\Faq;
use App\Services\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private FaqService $faqService;

    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index(FaqDataTable $dataTable)
    {
        $pageTitle = __('app.menu.faqs');
        return $dataTable->render('admin.faqs.index', compact('pageTitle'));
    }

    public function create()
    {
        $pageTitle = __('app.faqs.add_faq');
        $faq = new Faq();
        return view('admin.faqs.create-edit', compact('pageTitle', 'faq'));
    }

    public function store(StoreFaq $request)
    {
        $request->validated();
        $this->faqService->save($request);
        return redirect()
            ->route('admin.faqs.index')
            ->withSuccess(__('messages.created', ['item' => 'FAQ']));
    }

    public function show(Faq $faq)
    {
        $pageTitle = __('app.faqs.view_faq');
        return view('admin.faq.show', compact('faq', 'pageTitle'));
    }

    public function edit(Faq $faq)
    {
        $pageTitle = __('app.faqs.edit_faq');
        return view('admin.faqs.create-edit', compact('faq', 'pageTitle'));
    }

    public function update(StoreFaq $request, Faq $faq)
    {
        $request->validated();
        $this->faqService->update($request, $faq->id);
        return redirect()
            ->route('admin.faqs.index')
            ->withSuccess(__('messages.updated', ['item' => 'FAQ']));
    }

    public function destroy(Faq $faq)
    {
        $this->faqService->deleteById($faq->id);
        return response()->json([
            'status' => 'success',
            'message' => __('messages.deleted', ['item' => 'FAQ']),
        ]);
    }

    public function showAll()
    {
        $pageTitle = __('app.menu.faqs');
        $faqs = $this->faqService->getAll();
        return view('admin.faqs.show-all', compact('pageTitle', 'faqs'));
    }
}
