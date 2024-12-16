<div class="hstack gap-3 align-items-center text-center">
    <a class="text-primary" href="{{ route('admin.faqs.edit', $faq->id) }}" data-bs-tooltip="tooltip"
        title="{{ __('app.actions.edit') }}" data-bs-placement="top">
        <i class="fa fs-18 fa-regular fa-edit"></i>
    </a>
    <a class="text-danger" onclick="deleteFaq({{ $faq->id }})" href="javascript:void(0)" data-bs-tooltip="tooltip"
        title="{{ __('app.actions.delete') }}" data-bs-placement="top">
        <i class="fa fs-18 fa-regular fa-trash-alt"></i>
    </a>
</div>
