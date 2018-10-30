@extends('manager::template.page')
@section('content')
    <h1>
        <i class="fa fa-question-circle"></i> {{ ManagerTheme::getLexicon('help') }}
    </h1>

    <div class="sectionBody">
        <div class="tab-pane" id="helpPane">
            <script>
              var tp = new WebFXTabPane(document.getElementById('helpPane'), {{ get_by_key($modx->config, 'remember_last_tab') ? 1 : 0 }});
            </script>

            @foreach($pages as $k => $v)
                <div class="tab-page" id="tab{{ $k }}Help">
                    <h2 class="tab">{{ $v['name'] }}</h2>
                    <script>tp.addTabPage(document.getElementById('tab{{ $k }}Help'));</script>
                    @php(include_once($v['path']))
                </div>
            @endforeach
        </div>
    </div>
    @push('scripts.bot')
        <script>
          if (window.location.hash === '#version_notices') tp.setSelectedIndex(1);
        </script>
    @endpush
@endsection