<div>
    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Bodylink</label>
        <div class="col-sm-12 col-md-7 col-lg-9">
            <select id="bodylink_count" class="form-control selectric" name="bodylink_count">
                <option value="0">Empty</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
    </div>

    @for ($count)
        
    @endfor
</div>
@push('script')
    <script>
        "use strict";
        $('#bodylink_count').selectric().on('change', function() {
            @this.set('count', $(this).val())
            console.log($(this).val());
        });

    </script>
@endpush