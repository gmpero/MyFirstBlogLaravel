@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200">{{$date->translatedFormat('F')}} {{$date->day}}, {{$date->year}}
                • {{$date->format('H:i')}} • {{$post->comments->count()}} Комментари-ев(й/я)</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/' . $post->main_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!!$post->content!!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{asset('storage/' . $relatedPost->main_image)}}" alt="related post"
                                         class="post-thumbnail">
                                    <p class="post-category">{{$relatedPost->category->title}}</p>
                                    <a href="{{route('post.show', $relatedPost->id)}}"><h5
                                            class="post-title">{{$relatedPost->title}}</h5></a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <section class="comment-section mb-6">
                        <h3 class="mb-4">Комментарии</h3>
                        @foreach($post->comments as $comment)
                        <div class="card-footer card-comments mb-2">
                            <div class="card-comment">
                                <!-- User image -->

                                <div class="comment-text">
                                    <div class="mb-2">
                                        <span class="username text-primary">
                                              {{$comment->user->name}}
                                              <span class="text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}</span>
                                        </span><!-- /.username -->
                                    </div>
                                    {{$comment->message}}
                                </div>
                                <!-- /.comment-text -->
                            </div>
                        </div>
                        @endforeach
                    </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Добавить комментарий</h2>
                        <form action="{{route('post.comment.store', $post->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="message" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control"
                                              placeholder="Напишите комментарий!"
                                              rows="10"></textarea>
                                </div>
                                <input type="hidden" name="post_id" value={{$post->id}}>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Добавить" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
