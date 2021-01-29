@extends('layouts.app')

@section('content')
<main role="main">
    @if(have_posts())
        @while(have_posts())
            @php(the_post())
            <article>
                <header>
                    <h1>@php(the_title())</h1>
                </header>

                @php(the_content())
            </article>
        @endwhile
    @else
        <article>
            <p>Nothing to see.</p>
        </article>
    @endif
</main>
@endsection
