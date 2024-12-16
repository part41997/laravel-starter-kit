<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CmsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Cms;
use App\Models\Language;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index(CmsDataTable $dataTable)
    {
        $pageTitle = __('app.menu.cms');
        return $dataTable->render('admin.cms.index', compact('pageTitle'));
    }

    public function edit($slug)
    {
        $pageTitle = __("app.cms.$slug");
        $cms = Cms::where('slug', $slug)->with('translates.language')->latest()->first();
        return view('admin.cms.edit', compact('cms', 'pageTitle'));
    }

    public function update(Request $request, $slug)
    {
        $cms = Cms::where('slug', $slug)->with('translates.language')->latest()->first();
        foreach ($request->translates as $key => $value) {
            $cms->translates()->where('language_id', $key)->update([
                'title' => $value['title'],
                'content' => $value['content'],
            ]);
        }

        return redirect()->route('admin.cms.index')->with('success', __('messages.updated', ['item' => __('app.cms.' . $slug)]));
    }

    public function show($slug, $locale = 'en')
    {
        $language = Language::where('code', $locale)->first();
        $cms = Cms::where('slug', $slug)->with('translates.language')->latest()->first();
        $cms = $cms->translates->where('language_id', $language->id)->first();
        $pageTitle = $cms->title;
        $languages = Language::all();
        $slug = $cms->cms->slug;
        return view('admin.cms.show', compact('cms', 'pageTitle', 'languages', 'slug'));
    }
}
