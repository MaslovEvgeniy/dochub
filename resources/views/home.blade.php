@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">Статистика</div>

                <div class="card-body">
                    <h2>Кількість відвідувачів сайту <span class="badge badge-secondary">{{ $stats[0]->count }}</span></h2>
                    <h2>Кількість підписок <span class="badge badge-secondary">{{ $subscr->count() }}</span></h2>
                    <h2>Кількість відвідувачів івентів <span class="badge badge-secondary">{{ $visitors }}</span></h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">Підписки</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td style="padding-right: 15px;">Дата</td>
                            <td style="padding-right: 15px;">E-mail</td>
                        </tr>
                        @foreach($subscr as $s)
                            <tr>
                                <td>{{ $s->created_at->format('d.m.Y') }}</td>
                                <td>{{ $s->email }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
