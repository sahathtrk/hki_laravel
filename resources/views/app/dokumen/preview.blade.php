@extends('base') 
@section('judul-halaman', 'Preview Dokumen')  
@section('konten')  

    <script src="{{ asset('plugin/PDFJSExpress-view-only/lib/webviewer.min.js') }}"></script>
    
    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Preview Dokumen</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Dokumen</a>
                    </li> 
                    <li class="breadcrumb-item active" aria-current="page">Preview</li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div> 
    </div>

    <!-- KONTEN -->
    <div class="row">

        <div style="width:800px;" class="ml-4">  
            <div class="card mb-4">
                <div class="card-body">

                    <h5 class="mb-4">Preview PDF {{ $dokumen->judul }}</h5> 
                    <p>{{ $dokumen->deskripsi }}</p>
                    <hr>
                    <div id='viewer' class='pb-4' style="width: 100%; height : 600px; margin : 0 auto; "></div>
                    <!-- TOMBOL -->  
                    <div class="d-flex justify-content-end align-items-center"> 
                        <a href="{{ route('dokumen.read') }}" class="btn btn-danger mb-1">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
 
    <script>
        let server = "https://hki-huriakristenindonesia.com/";
        let dokumen = "{{ $dokumen->file }}";
 
        WebViewer({
          path: server+"plugin/PDFJSExpress-view-only/lib", // path to the PDF.js Express'lib' folder on your server
          licenseKey: '6Hj0H7CVyOJKXRjHVSum',
          initialDoc: server+dokumen,
          // initialDoc: '/path/to/my/file.pdf',  // You can also use documents on your server
        }, document.getElementById('viewer'))
        .then(instance => {
          // now you can access APIs through the WebViewer instance
          const { Core, UI } = instance;
          instance.UI.setTheme('dark');
          // adding an event listener for when a document is loaded
          Core.documentViewer.addEventListener('documentLoaded', () => {
            console.log('document loaded');
          });
      
          // adding an event listener for when the page number has changed
          Core.documentViewer.addEventListener('pageNumberUpdated', (pageNumber) => {
            console.log(`Page number is: ${pageNumber}`);
          });
        });
      </script>
@endsection