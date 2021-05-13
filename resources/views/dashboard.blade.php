<x-app-layout>
    <x-header/>
       <div class="container">
            <div class="row">
                <div class="col-lg-12 col-lg-offset-2" style="margin: auto; background: #fff">
                    {{-- {{Request::url()}} --}}
                    
                    @if(Request::is('dashboard'))
                        <x-jet-welcome />
                    @elseif(Request::is('services'))
                        <x-services />
                    @endif
                    
                    </div>
                </div>
            </div>
        </div>
        
        <!-- /#page-content-wrapper -->
        <!-- Below division is for page wroper dont remvoe it-->
    </div>
<x-footer/> 
</x-app-layout>
