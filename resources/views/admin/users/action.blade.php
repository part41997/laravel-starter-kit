<div class="hstack gap-3 align-items-center text-center">
    <a class="text-info" href="{{ route('admin.users.show', $user->id) }}" data-bs-tooltip="tooltip" title="{{ __('app.actions.view') }}" data-bs-placement="top">
        <i class="fa fs-18 fa-regular fa-eye"></i>
    </a>
    <a class="text-primary" href="{{ route('admin.users.edit', $user->id) }}" data-bs-tooltip="tooltip" title="{{ __('app.actions.edit') }}" data-bs-placement="top">
        <i class="fa fs-18 fa-regular fa-edit"></i>
    </a>
    <a class="text-danger" onclick="deleteUser({{ $user->id }})" href="javascript:void(0)" data-bs-tooltip="tooltip" title="{{ __('app.actions.delete') }}" data-bs-placement="top">
        <i class="fa fs-18 fa-regular fa-trash-alt"></i>
    </a>
</div>