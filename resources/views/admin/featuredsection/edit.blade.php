<form action="{{ route('featured.update', $featured->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="heading" value="{{ $featured->heading }}" required>
    <input type="text" name="subheading" value="{{ $featured->subheading }}" required>

    <label>Left Image</label>
    <input type="file" name="left_image">
    <img src="{{ asset('storage/'.$featured->left_image) }}" width="80">

    <label>Icon Image</label>
    <input type="file" name="icon_image">
    <img src="{{ asset('storage/'.$featured->icon_image) }}" width="80">

    <!-- Accordion JSON ke through input me bhejenga -->
    @php $accordions = json_decode($featured->accordions, true); @endphp
    @foreach($accordions as $index => $acc)
        <input type="text" name="accordions[{{ $index }}][question]" value="{{ $acc['question'] }}">
        <textarea name="accordions[{{ $index }}][answer]">{{ $acc['answer'] }}</textarea>
    @endforeach

    <!-- Info Table JSON hai-->
    @php $info = json_decode($featured->info_table, true); @endphp
    @foreach($info as $index => $item)
        <input type="text" name="info_table[{{ $index }}][image]" value="{{ $item['image'] }}">
        <input type="text" name="info_table[{{ $index }}][heading]" value="{{ $item['heading'] }}">
        <input type="text" name="info_table[{{ $index }}][subheading]" value="{{ $item['subheading'] }}">
    @endforeach

    <button type="submit" class="btn btn-success">Update</button>
</form>
