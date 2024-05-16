<div class="modal" id="user-{{ $user->id }}-delete-model">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">@lang('admins.dialogs.delete.title')</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>@lang('admins.dialogs.delete.info')</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="button" class="btn ripple btn-secondary" data-dismiss="modal">
                        @lang('admins.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn ripple btn-primary">
                        @lang('admins.dialogs.delete.confirm')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>