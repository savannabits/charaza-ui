@php echo "<?php";
@endphp

namespace {{ $controllerNamespace }};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
class {{ $controllerBaseName }} extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('{{str_plural($modelRouteAndViewName)}}.index');
        $columns = [
            @foreach($columnsToQuery as $col)
[
                "data" => "{{$col}}",
                "name" => "{{$col}}",
                "title" => "{{ str_replace("_", " ", Str::title($col)) }}"
            ],
            @endforeach
];
        $actions = [
            [
                "tag" => "button",
                "href" => "",
                "title" => "details",
                "icon" => "mdi mdi-eye",
                "event" => "show-{{str_singular($modelRouteAndViewName)}}",
                "classes" => "btn btn-secondary rounded-0"
            ],
            [
                "tag" => "button",
                "href" => "",
                "title" => "edit",
                "icon" => "mdi mdi-pencil",
                "event" => "edit-{{str_singular($modelRouteAndViewName)}}",
                "classes" => "btn btn-primary rounded-0"
            ],
        ];
        return view('backend.{{str_plural($modelRouteAndViewName)}}.index', compact('columns', 'actions'));
    }
@if($export)

    /**
     * Export entities
     *
     * {{'@'}}return BinaryFileResponse|null
     */
    public function export(): ?BinaryFileResponse
    {
        return Excel::download(app({{ $exportBaseName }}::class), '{{ str_plural($modelVariableName) }}.xlsx');
    }
@endif}
