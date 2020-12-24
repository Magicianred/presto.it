<x-back_layout>
    <div class="container-fluid">
        <div class="row">
            <x-backsidebar />
            <div class="col-md-9 col-lg-10">
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <h1>{{ __('ui.Crea il tuo annuncio') }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 px-5">
                        <form action="{{ route('announcements.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="uniqueSecret" value="{{ $uniqueSecret }}">
                            <div class="form-group">
                                <label for="title">{{ __('ui.Titolo') }}</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger">

                                        {{ $message }}

                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">{{ __('ui.Categoria') }}</label>
                                <div class="col-md-6 p-0">
                                    <select name="category" id="category" class="form-control" required>
                                        <option disabled selected value="0">{{ __('ui.Seleziona Categoria') }}</option>
                                        @switch(App::getLocale())
                                            @case('it')
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name_it }}
                                                </option>
                                            @endforeach
                                            @break
                                            @case('en')
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name_en }}
                                            </option>
                                            @endforeach

                                            @break
                                            @default

                                        @endswitch

                                    </select>
                                </div>

                                @error('category')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">{{ __('ui.Prezzo') }}</label>
                                <div class="col-md-6 p-0">
                                    <input type="number" class="form-control" name="price" value="{{ old('price') }}"
                                        placeholder="€">
                                    @error('price')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                @error('category')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">{{ __('ui.Descrizione') }}</label>
                                <textarea name="body" class="form-control input-error" id="body" cols="30"
                                    rows="10">{{ old('body') }}</textarea>
                                @error('body')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('ui.Immagini') }}</label>
                                <div class="dropzone" id="drophere" name="img">

                                </div>
                                {{-- @error('img')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror --}}
                            </div>



                            <button type="submit" class="btn btn-primary mb-3 mt-3">{{ __('ui.Invia') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-back_layout>
