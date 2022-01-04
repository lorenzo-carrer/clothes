@extends('templates.base')
@section('title', 'Produtos')
@section('h1', 'Página de Produtos')


@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" integrity="sha512-0SPWAwpC/17yYyZ/4HSllgaK7/gg9OlVozq8K7rf3J8LvCjYEEIfzzpnA2/SSjpGIunCSD18r3UhvDcu/xncWA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')

<div id="divImagem">
    <img id="img-crop" src="{{asset('img/' . $prod->imagem)}}">
</div>

<form action="{{route('produtos.recortarPronto',['prod' => $prod,])}}" method="post" id="cortar">
    @csrf

    <input type="hidden" name="img" id="img">
    <p>
        <input type="submit" value="Cortar" class="btn-primary btn"> 
    </p>

</form>




@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/cropper.js')}}"></script>

    <script>
        var el = document.getElementById("cortar");
        el.addEventListener("submit", function(e){
            e.preventDefault();
        
            var img = cropper.getCroppedCanvas().toDataURL('image/jpeg');
            document.querySelector("#img").value= img;
            this.submit();
        
        });



    </script>
@endpush
