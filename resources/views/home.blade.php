@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Área restrita </div>

				<div class="panel-body">
					Você esta logado no sistema !
				</div>
			</div>
		</div>
	</div>

    <div class="row">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    </div>

</div>


@endsection