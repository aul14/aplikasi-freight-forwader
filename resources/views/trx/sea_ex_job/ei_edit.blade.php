<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="letter_of_credit">Letter of Credit</label>
            <input type="text" value="{{ old('letter_of_credit', $sd4->letter_of_credit) }}"
                class="form-control @error('letter_of_credit') is-invalid @enderror" name="letter_of_credit"
                id="letter_of_credit">
            @error('letter_of_credit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="place_of_issue">Place of Issue</label>
            <input type="text" value="{{ old('place_of_issue', $sd4->place_of_issue) }}"
                class="form-control @error('place_of_issue') is-invalid @enderror" name="place_of_issue"
                id="place_of_issue">
            @error('place_of_issue')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_of_issue">Date of Issue</label>
            <input type="text"
                value="{{ old('date_of_issue', !empty($sd4->date_of_issue) ? date('d/m/Y', strtotime($sd4->date_of_issue)) : '') }}"
                placeholder="Date of Issue" autocomplete="off"
                class="form-control @error('date_of_issue') is-invalid @enderror date-picker" name="date_of_issue"
                id="date_of_issue">
            @error('date_of_issue')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="issue_by">Issue By</label>
            <input type="text" value="{{ old('issue_by', $sd4->issue_by) }}"
                class="form-control @error('issue_by') is-invalid @enderror" name="issue_by" id="issue_by">
            @error('issue_by')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="said_to_contain">Said To Contain</label>
            <input type="text" value="{{ old('said_to_contain', $sd4->said_to_contain) }}"
                class="form-control @error('said_to_contain') is-invalid @enderror" name="said_to_contain"
                id="said_to_contain">
            @error('said_to_contain')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="total_pcs_in_word">Total Pcs in Word</label>
            <input type="text" value="{{ old('total_pcs_in_word', $sd4->total_pcs_in_word) }}"
                class="form-control @error('total_pcs_in_word') is-invalid @enderror" name="total_pcs_in_word"
                id="total_pcs_in_word">
            @error('total_pcs_in_word')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="do_release_to">Delivery Order Release To</label>
            <input type="text" value="{{ old('do_release_to', $sd4->do_release_to) }}"
                class="form-control @error('do_release_to') is-invalid @enderror" name="do_release_to"
                id="do_release_to">
            @error('do_release_to')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="do_release_date">Delivery Order Release Date</label>
                    <input type="text"
                        value="{{ old('do_release_date', !empty($sd4->do_release_date) ? date('d/m/Y', strtotime($sd4->do_release_date)) : '') }}"
                        placeholder="Delivery Order Release Date" autocomplete="off"
                        class="form-control @error('do_release_date') is-invalid @enderror date-picker"
                        name="do_release_date" id="do_release_date">
                    @error('do_release_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cargo_collection_date">Cargo Collection Date</label>
                    <input type="text"
                        value="{{ old('cargo_collection_date', !empty($sd4->cargo_collection_date) ? date('d/m/Y', strtotime($sd4->cargo_collection_date)) : '') }}"
                        placeholder="Cargo Collection Date" autocomplete="off"
                        class="form-control @error('cargo_collection_date') is-invalid @enderror date-picker"
                        name="cargo_collection_date" id="cargo_collection_date">
                    @error('cargo_collection_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="obl_surrendered">OB/L Surrendered</label>
            <div class="col-md-6">
                <input type="checkbox" name="obl_surrendered" @checked(old('obl_surrendered', $sd4->obl_surrendered) == 'yes') value="yes"
                    data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="danger">
                @error('obl_surrendered')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="obl_freight">OB/L Freight </label>
            <select class="select-2 @error('obl_freight') is-invalid @enderror" name="obl_freight">
                <option value=""></option>
                <option value="COLLECT" @selected(old('obl_freight', $sd4->obl_freight) == 'COLLECT')>COLLECT</option>
                <option value="PREPAID" @selected(old('obl_freight', $sd4->obl_freight) == 'PREPAID')>PREPAID</option>
            </select>
            @error('obl_freight')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="telex_release">Telex Release? </label>
            <div class="col-md-6">
                <input type="checkbox" name="telex_release" @checked(old('telex_release', $sd4->telex_release) == 'yes') value="yes"
                    data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary"
                    data-offstyle="danger">
                @error('telex_release')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="laden_on_board">Laden/On Board Date</label>
            <input type="text"
                value="{{ old('laden_on_board', !empty($sd4->laden_on_board) ? date('d/m/Y', strtotime($sd4->laden_on_board)) : '') }}"
                placeholder="Laden/On Board Date" autocomplete="off"
                class="form-control @error('laden_on_board') is-invalid @enderror date-picker" name="laden_on_board"
                id="laden_on_board">
            @error('laden_on_board')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" cols="30"
                rows="10">{{ old('note', $sd4->note) }}</textarea>
            @error('note')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>
</div>
{{-- @section('sub_script_5')
    <script>
        $(function() {

        });
    </script>
@endsection --}}
