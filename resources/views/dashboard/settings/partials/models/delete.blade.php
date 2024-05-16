<div class="modal" id="setting-{{ $setting->id }}-delete-model">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">@lang('settings.dialogs.delete.title')</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>@lang('settings.dialogs.delete.info')</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('settings.destroy', $setting->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="button" class="btn ripple btn-secondary" data-dismiss="modal">
                        @lang('settings.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn ripple btn-primary">
                        @lang('settings.dialogs.delete.confirm')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>