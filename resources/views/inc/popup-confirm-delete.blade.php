<div id="popup-confirm" class="modal popup-confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Do you really want to delete lead "{{$name}}" ?</p>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                <form class="inline" action="{{route($route_delete, $id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-sm btn-danger" type="submit">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>