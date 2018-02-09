@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card card-default">
                    <div class="card-header">Події</div>
                    <div class="card-body">
                        @if($news->count())
                            @foreach($news as $report)
                                <?php $file = File::exists(public_path("uploads/news/{$report->id}.jpg")) ? asset("/uploads/news/$report->id.jpg") : asset('img/no.jpg') ?>
                                <div class="media" style="margin-bottom: 25px;">
                                    <img class="mr-3 img-responsive" src="{{ $file }}" alt="img"
                                         style="width: 30%; height: auto;">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{ $report->name }} - {{ \Carbon\Carbon::parse($report->date)->format('d.m.Y') }}</h5>
                                        <a href="#" class="remove"><i class="fa fa-remove pull-right"
                                                                      data-id="{{ $report->id }}"></i></a>
                                        {{ $report->desc }}
                                        <p style="margin-top: 20px;">Відвідувачів: {{ $report->visitors }}</p>
                                        <p>Місце проведення: {{ $report->place }}</p>
                                    </div>
                                </div>
                            @endforeach
                            {{ $news->links() }}
                        @else
                            <p>Подій поки що немає</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-default">
                    <div class="card-header">Додати подію</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.addnews') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Назва</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="desc">Опис</label>
                                <textarea class="form-control" name="desc" id="desc" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="place">Місце проведення</label>
                                <input type="text" class="form-control" name="place" id="place" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Дата</label>
                                <input id="date" class="form-control" name="date" type="date" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Зображення</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01"></label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-block">Додати</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var url = '{{ route('admin.deletenews') }}';
        $(document).ready(function () {
            $(document).on('click', 'a.remove', function () {
                var $elem = $(this);
                var id = $(this).find('i').data('id');
                swal({
                    title: "Підтвердження",
                    text: "Ви впевнені, що хочете видалити цю подію?",
                    icon: "warning",
                    buttons: {
                        cancel: "Ні",
                        defeat: "Так",
                    },
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url,
                            dataType: 'json',
                            method: 'POST',
                            data: { id: id}
                        }).done(function (data) {
                            var $media = $elem.closest('.media');
                            $media.animateCss('fadeOutRight', function () {
                                $media.remove();
                            });

                            swal('Подію успішно видалено!');
                        })
                    }
                });
            });
        });
    </script>
@endsection