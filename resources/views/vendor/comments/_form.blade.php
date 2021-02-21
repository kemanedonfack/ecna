<div class="">
    <div class="card-body">
        @if($errors->has('commentable_type'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->get('commentable_type') }}
            </div>
        @endif
        @if($errors->has('commentable_id'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->get('commentable_id') }}
            </div>
        @endif
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            @honeypot
            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
            <input type="hidden" name="commentable_id" value="{{ $model->id }}" />

            {{-- Guest commenting --}}
            @if(isset($guest_commenting) and $guest_commenting == true)
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input type="text" placeholder="votre nom" class="form-control @if($errors->has('guest_name')) is-invalid @endif" name="guest_name" />
                        @error('guest_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="email" placeholder="votre Adresse mail" class="form-control @if($errors->has('guest_email')) is-invalid @endif" name="guest_email" />
                        @error('guest_email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            @endif

            <div class="form-group">
                <textarea placeholder="votre commentaire" class="form-control  @if($errors->has('message')) is-invalid @endif" name="message" cols="10" rows="10"></textarea>
                <div class="invalid-feedback">
                    Your message is required.
                </div>
                <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>
            </div>
            <button type="submit" class="col-12 btn btn-md btn-primary text-uppercase">Poster le commentaire</button>
        </form>
    </div>
</div>
<br />