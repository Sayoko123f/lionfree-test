onmessage = function (e) {
    // console.log('Message received from main script');
    console.log(e.data);
    // console.log('Posting message back to main script');
    let data = e.data;
    while (data.now < data.max) {
        data.now++;
        postMessage(data.now);
    }
}