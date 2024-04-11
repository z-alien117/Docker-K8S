<div id="largeModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{(isset($title)?$title:'')}}</h4>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                {{(isset($content)?$content:'')}}
            </div>
            <div class="modal-footer">
                {{(isset($footer)?$footer:'')}}
            </div>
        </div>
    </div>
</div>