<hr>
<div class="row mt-3">
    <div class="col-md-6">
        @for ($i = 1; $i <= 5; $i++)
            <div class="row align-items-center">
                <div class="col-md-1">
                    <label>{{ $i }}. </label>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="d-flex flex-row">
                            <div class=" p-2">
                                <select name="rate_{{ $i }}[]" id="rate_{{ $i }}"
                                    class="form-control">
                                    <option value="" disabled selected>Rate</option>
                                    <option value="Minimum">Minimum</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Quantity">Quantity</option>
                                    <option value="Class">Class</option>
                                </select>
                            </div>
                            <div class=" p-2">
                                <input type="text" class="form-control" autocomplete="off" placeholder="SCR"
                                    name="scr_{{ $i }}[]" id="scr_{{ $i }}">
                            </div>
                            <div class=" p-2">
                                <input type="text" class="form-control" data-type='currency' autocomplete="off"
                                    placeholder="Break Point" name="break_point_{{ $i }}[]"
                                    id="break_point_{{ $i }}">
                            </div>
                            <div class=" p-2">
                                <input type="text" class="form-control" data-type='currency' autocomplete="off"
                                    placeholder="Quote Amount" name="quote_amt_{{ $i }}[]"
                                    id="quote_amt_{{ $i }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    <div class="col-md-6">
        @for ($i = 6; $i <= 10; $i++)
            <div class="row align-items-center">
                <div class="col-md-1">
                    <label>{{ $i }}. </label>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="d-flex flex-row">
                            <div class=" p-2">
                                <select name="rate_{{ $i }}[]" id="rate_{{ $i }}"
                                    class="form-control">
                                    <option value="" disabled selected>Rate</option>
                                    <option value="Minimum">Minimum</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Quantity">Quantity</option>
                                    <option value="Class">Class</option>
                                </select>
                            </div>
                            <div class=" p-2">
                                <input type="text" class="form-control" autocomplete="off" placeholder="SCR"
                                    name="scr_{{ $i }}[]" id="scr_{{ $i }}">
                            </div>
                            <div class=" p-2">
                                <input type="text" class="form-control" data-type='currency' autocomplete="off"
                                    placeholder="Break Point" name="break_point_{{ $i }}[]"
                                    id="break_point_{{ $i }}">
                            </div>
                            <div class=" p-2">
                                <input type="text" class="form-control" data-type='currency' autocomplete="off"
                                    placeholder="Quote Amount" name="quote_amt_{{ $i }}[]"
                                    id="quote_amt_{{ $i }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
