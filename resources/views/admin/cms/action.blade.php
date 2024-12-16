<div class="hstack gap-3 align-items-center text-center">
    <a class="text-primary" href="{{ route('admin.cms.edit', ['slug' => $cms->slug]) }}" data-bs-tooltip="tooltip"
        title="{{ __('app.actions.edit') }}" data-bs-placement="top">
        <i class="fa fs-18 fa-regular fa-edit"></i>
    </a>
    <a class="text-info" href="{{ route('cms.show', ['slug' => $cms->slug, 'locale' => app()->getLocale()]) }}"
        target="_blank" data-bs-tooltip="tooltip" title="{{ __('app.actions.view') }}" data-bs-placement="top">
        <i class="fa fs-18 fa-regular fa-eye"></i>
    </a>
</div>
