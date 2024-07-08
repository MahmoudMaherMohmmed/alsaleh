<div class="modal" id="company-expense-{{ $company_expense->id }}-delete-model">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">@lang('company_expenses.dialogs.delete.title')</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>@lang('company_expenses.dialogs.delete.info')</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('company_expenses.destroy', $company_expense->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="button" class="btn ripple btn-secondary" data-dismiss="modal">
                        @lang('company_expenses.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn ripple btn-primary">
                        @lang('company_expenses.dialogs.delete.confirm')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
