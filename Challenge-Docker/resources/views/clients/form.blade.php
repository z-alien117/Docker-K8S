@isset($client)
    <x-modal>
        @slot('title')
            Edit Client
        @endslot
        @slot('content')
            <form class="mb-0" id="DynamicForm" name="template-contactform" action="{{route('functions.update_client', ['client_update'=>$client->id])}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-process">
                    <div class="css3-spinner">
                        <div class="css3-spinner-scaler"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="template-contactform-name">Name <small>*</small></label>
                        <input type="text" name="name" id="name" value="{{$client->Name}}" class="sm-form-control required" />
                    </div>

                    <div class="w-100"></div>

                    <div class="col-12 form-group d-none">
                        <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                    </div>
                </div>
                <input type="hidden" name="prefix" value="template-contactform-">
            </form>
        @endslot
        @slot('footer')
            <button class="btn_save button button-3d button-rounded button-green"><i class="icon-save2"></i> Update</button>

            <button class="button button-3d button-rounded button-red"  data-bs-dismiss="modal"><i class="icon-thumbs-down21"></i> Cancel</button>
        @endslot
    </x-modal>
@endisset

<x-modal>
    @slot('title')
        Add Client
    @endslot
    @slot('content')
        <form class="mb-0" id="DynamicForm" name="template-contactform" action="{{route('functions.store_client')}}" method="POST">
            @csrf
            <div class="form-process">
                <div class="css3-spinner">
                    <div class="css3-spinner-scaler"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="template-contactform-name">Name <small>*</small></label>
                    <input type="text" name="name" id="name" value="" class="sm-form-control required" />
                </div>

                <div class="w-100"></div>

                <div class="col-12 form-group d-none">
                    <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                </div>

                
            </div>
            <input type="hidden" name="prefix" value="template-contactform-">
        </form>
    @endslot
    @slot('footer')
    <div class="col-12 form-group">
        <button class="btn_save button button-3d button-rounded button-green"><i class="icon-save2"></i> Save</button>
        <button class="button button-3d button-rounded button-red"  data-bs-dismiss="modal"><i class="icon-thumbs-down21"></i> Cancel</button>
    </div>
    @endslot
</x-modal>