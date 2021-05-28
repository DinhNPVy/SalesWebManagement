const video = document.getElementById('videoF');

const loadFAPI = async() => {
    await faceapi.nets.faceLandmark68Net.loadFAPI('../face-api.js-master/weights');
    await faceapi.nets.faceRecognitionNet.loadFAPI('../face-api.js-master/weights');
    await faceapi.nets.tinyFaceDetector.loadFAPI('../face-api.js-master/weights');
    await faceapi.nets.faceExpressionNet.loadFAPI('../face-api.js-master/weights');

}

if(navigator.mediaDevices.getUserMedia){
    navigator.mediaDevices.getUserMedia({vidoe: {} })
        .then(stream =>{
            video.src(Object = stream);
        });
}

video.addEventListener('play', () =>{

    const canvas = faceapi.createCanvasFromMedia(video);
    document.body.append(canvas);

    setInterval(() => {
        const dectest = await faceapi.detectAlFaces(video, new faceapi.TinyFaceDetectorOptions())
            .withFaceLandmarks()
            .withFaceExpressions();

        const resizedDetects = faceapi.resizeResults(dectest, displaySize)
       // console.log('detects', detects );
        
        canvas.getContext('2d').clearRect(0,0, displaySize.with, displaySize.height);
        
        faceapi.draw.drawDetectortions(canvas, resizedDetects);
        faceapi.draw.drawFaceLandmarks(canvas, resizedDetects);
        faceapi.draw.drawFaceExpressions(canvas, resizedDetects);
    }, 300);
})

loadFAPI().then(getCameraStream);