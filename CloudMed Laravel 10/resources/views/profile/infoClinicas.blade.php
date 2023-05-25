@section('title', 'info')

<x-app-layout>
    <section class="login session-allow">

        <section class="profile my-5 w-full">
            <div class="form md:w-4/5 lg:w-1/2">
                <div class="title-profile mb-5">
                    <h2> Suas Carteirinhas </h2>
                </div>

                <div class="w-1/2">
                    @if ($convenio->isEmpty())
                        <form method="post" action="{{ route('convenio.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <x-input-label for="num-convenio" :value="__('Cartão do Convênio:')" />
                                <x-text-input type="text" name="numConvenio" id="numConvenio" :value="old('')"
                                    required />
                            </div>
                            <div class="">
                                <x-input-label for="nomeConvenio" :value="__('Nome do Convenio:')" />
                                <x-text-input type="text" name="nomeConvenio" id="nomeConvenio" required />
                            </div>
                            <div class="">
                                <x-input-label for="plano" :value="__('Plano:')" />
                                <x-text-input type="text" name="plano" id="plano" required />
                            </div>
                            <div class="">
                                <h3> Cartão do Convênio:</h3><br>
                                <div class="text-center">
                                    <div id="preview-container" class="image-container m-auto w-4/5">
                                        <img id="chosen-image" class="img-preview">
                                    </div>

                                    <figcaption id="file-name"></figcaption>

                                    <div id="file-info" class="file-info"></div>

                                    <input type="file" name="arquivo" id="arquivo" accept="image/*">
                                    <label
                                        class="text-md pointer relative m-auto block w-1/2 cursor-pointer rounded-md bg-cyan-700 py-2.5 text-center text-white hover:bg-cyan-900"
                                        for="arquivo">
                                        <i class="fas fa-upload"></i> &nbsp; Escolha um Arquivo
                                    </label>

                                </div>
                            </div>

                            <button type="submit"
                                class="mr-4 mb-2 rounded-lg border border-cyan-600 px-7 py-2 text-center font-medium text-cyan-700 hover:bg-cyan-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-cyan-50">
                                Salvar Carteirinha
                            </button>
                        </form>
                    @else
                        @foreach ($convenio as $infoConvenio)
                        <form method="post" action="{{ route('convenio.update', $infoConvenio->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <x-input-label for="num-convenio" :value="__('Cartão do Convênio:')" />
                                <x-text-input type="text" name="numConvenio" id="numConvenio" :value="old('numero', $infoConvenio->numero )"
                                     />
                            </div>
                            <div class="">
                                <x-input-label for="nomeConvenio" :value="__('Nome do Convenio:')" />
                                <x-text-input type="text" name="nomeConvenio" id="nomeConvenio" :value="old('nomeConvenio', $infoConvenio->nomeConvenio )"  />
                            </div>
                            <div class="">
                                <x-input-label for="plano" :value="__('Plano:')" />
                                <x-text-input type="text" name="plano" id="plano" :value="old('plano', $infoConvenio->plano )"  />
                            </div>

                            <div class="">
                                <h3> Cartão do Convênio:</h3><br>
                                <div class="text-center">

                                    <p class="mb-2 block py-2 font-semibold text-gray-900"> Carteirinha:</p>

                                    <div class="mb-5" id="preview-container">

                                        <img src="{{ asset('storage/carteirinha_convenio/' . $infoConvenio->nome_arquivo) }}"
                                            alt="Preview da Carteirinha" id="chosen-image"
                                            class="img-preview m-auto w-4/5 rounded-lg border border-gray-300 shadow-sm">

                                        <figcaption id="file-name" class="mb-2 block py-2 font-medium text-gray-900">
                                            {{ $infoConvenio->nome_arquivo }}
                                        </figcaption>

                                    </div>

                                    <div id="file-info" class="file-info bg-white"></div>

                                    <div class="relative m-auto mb-2 w-1/2">
                                        <input type="file" name="arquivo" id="arquivo" >
                                        <figcaption id="file-name"></figcaption>
                                        <label
                                            class="text-md pointer relative m-auto block cursor-pointer rounded-md bg-cyan-700 py-2.5 text-center text-white hover:bg-cyan-900"
                                            for="arquivo">
                                            <i class="fas fa-upload"></i> &nbsp; Escolha um novo arquivo
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                            class="mb-2 rounded-lg border border-emerald-600 px-7 py-2 text-center font-medium text-emerald-800 hover:bg-emerald-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-emerald-50"
                            value="Salvar">Salvar</button>
                        </form>
                            
                        @endforeach
                    @endif
                </div>

                {{-- <form action="" enctype="multipart/form-data">
                    <div class="flex w-full content-center items-center justify-evenly">
                        <div class="m-5 w-1/2 bg-slate-200">
                            <div class="">
                                <x-input-label for="num-sus" :value="__('Cartão do Sus:')" />
                                <x-text-input type="text" name="sus" id="sus" required
                                    placeholder="00000000000 0000 0" />
                            </div>
                            <div class="mt-5">
                                <h3> Cartão do SUS:</h3><br>
                                <div class="text-center">

                                    <div id="preview-container" class="image-container m-auto w-4/5">
                                        <img id="chosen-image" class="img-preview">
                                    </div>

                                    <figcaption id="file-name"></figcaption>

                                    <div id="file-info" class="file-info"></div>

                                    <input type="file" name="arquivo" id="arquivo" required accept="image/*">
                                    <label
                                        class="text-md pointer relative m-auto block w-1/2 cursor-pointer rounded-md bg-cyan-700 py-2.5 text-center text-white hover:bg-cyan-900"
                                        for="arquivo">
                                        <i class="fas fa-upload"></i> &nbsp; Escolha um Arquivo
                                    </label>

                                </div>
                            </div>

                            <div class="button m-auto flex flex-wrap items-center justify-center">
                                <a href="{{ route('sus.store') }}">
                                    <button type="button"
                                        class="mr-4 mb-2 rounded-lg border border-cyan-600 px-7 py-2 text-center font-medium text-cyan-700 hover:bg-cyan-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-cyan-50">
                                        Editar Carteirinha
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </form> --}}

            </div>

        </section>

        <section class="profile my-5 w-full">
            <div class="form md:w-4/5 lg:w-1/2">
                @if ($infoClinica->isEmpty())
                    @include('profile.partials.cadastrar-info-clinica')
                @else
                    @include('profile.partials.update-info-clinica')
                @endif
            </div>
        </section>

    </section>

</x-app-layout>
