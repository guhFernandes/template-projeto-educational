<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <!-- Button trigger modal -->
    </x-slot>

    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Funcionário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/adicionar/noticia" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Competencia</label>
                            <input type="text" class="form-control" id="exampleFormControlTextarea1" name="competencia">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="cargo">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Salário</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="salario">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="button" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="button">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- fim modal -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($tipo == 'get')
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Salário</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultado as $v)
                            <tr>
                                <th scope="row">{{$v->id}}</th>
                                <td>{{$v->nome}}</td>
                                <td>{{$v->cargo}}</td>
                                <td>{{$v->salario}}</td>
                                <td>
                                    <div class="btnj">
                                        <form action="/editar/noticia" method="get">
                                            <input type="hidden" name="id" value="{{$v->id}}">
                                            <button type="submit" class="button">Editar</button>
                                        </form>
                                        <form action="/deletar/noticia" method="get">
                                            <input type="hidden" name="id" value="{{$v->id}}">
                                            <button type="submit" class="button">Deletar</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @elseif($tipo == "editar")
                    @foreach($resultado as $x)
                    <form action="/atualizar/noticia" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$x->id}}">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">nome</label>
                            <input type="text" class="form-control" value="{{$x->nome}}" id="exampleFormControlInput1" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">competencia</label>
                            <textarea class="form-control" name="competencia" id="exampleFormControlTextarea1" rows="3">{{$x->competencia}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">cargo</label>
                            <input type="text" class="form-control" value="{{$x->cargo}}" id="exampleFormControlInput1" name="cargo">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">salario</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$x->salario}}" name="salario">
                        </div>
                        <button type="submit" class="button">editar</button>
                    </form>
                    @endforeach
                    @endif
                </div>
                <div class="btnjx">
                    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar Funcionário</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>