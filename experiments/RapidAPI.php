<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://twinword-sentiment-analysis.p.rapidapi.com/analyze/?text=I%20was%20expecting%20more%20from%20this%20movie%2C%20but%20it%20turned%20out%20to%20be%20a%20big%20disappointment.%20%20First%20of%20all%20Vikings%20in%20this%20movie%20were%20represented%20more%20like%20an%20animals%2C%20acting%20like%20a%20rabid%20animals%20rather%20than%20humans%20and%20Vikings%20we%20have%20seen%20in%20popular%20TV%20shows%2C%20but%20the%20reason%20why%20I'm%20giving%20such%20a%20low%20score%20to%20this%20movie%20is%20simple%20-%20boredom.%20%20Character%20development%20was%20poor.%20I%20didn't%20care%20for%20any%20of%20them.%20Story%20was%20a%20typical%20vengeance%20story%2C%20nothing%20special%20or%20unique%20and%20the%20movie%20itself%20was%20very%20slow%2C%20lacking%20action%20and%20I%20almost%20fell%20a%20sleep.%20At%20first%20it%20seemed%20a%20realistic%20movie%2C%20but%20then%20they%20started%20putting%20supernatural%20things%2C%20so%20it%20wasn't%20realistic%2C%20but%20wasn't%20a%20typical%20unrealistic%20movie%20(like%20Marvel%20and%20DC)%20either.%20It%20was%20just%20a%20poor%20attempt%20of%20mixed%20jumble.%20It's%20sad%20to%20see%20such%20a%20great%20actors%20wasted%20in%20this%20boring%20movie%2C%20but%20even%20they%20couldn't%20save%20it%20if%20script%20was%20so%20poorly%20written%20and%20executed.",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "X-RapidAPI-Host: twinword-sentiment-analysis.p.rapidapi.com",
    "X-RapidAPI-Key: aab52971dcmshbe140de1586df6fp1fc6abjsnb18d0ef0f601"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}