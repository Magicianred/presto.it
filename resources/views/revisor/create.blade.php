<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('contacts_revisor_save') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="fullname">Nome e Cognome</label>
                        <input type="text" class="form-control" id="fullname" name="fullname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email">
                    </div>
                    <div class="form-group">
                        <label for="description">Perché vuoi diventare un revisore?</label>
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="form-control"></textarea>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1" name="checkbox">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</x-layout>
