@if (session()->has('message'))
    @php
    $message = session()->get('message');
    @endphp
    <div class="alert alert-dismissable alert-success alert-block" style="z-index: 1000;">

	<button type="button" class="close" data-dismiss="alert">x</button>	

        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-dismissable alert-danger alert-block" style="z-index: 1000;">

	            <button type="button" class="close" data-dismiss="alert">x</button><br/>

                <strong>{{ $error }}</strong>
                </div>

            @endforeach

@endif
