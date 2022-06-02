$imageName = time().'.'.$request->img_url->extension();
$request->image->move(public_path('images'), $imageName);

// storage image in public folder
$request->img_url->move(public_path('images'), $imageName);


// composer require intervention/image

$image = $request->file('image');
$input['imagename'] = time().'.'.$image->extension();

$destinationPath = public_path('/assets/img/vehicles');
$img = Image::make($image->path());
$img->resize(100, 100, function ($constraint){
    $constraint->aspectRatio();
})->save($destinationPath.'/'.$input['imagename']);

// not necessary
$destinationPath = public_path('/images');
$image->move($destinationPath, $input['imagename']);