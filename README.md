# HTML-obfuscator
HTML-obfuscator is a PHP-based web application that obfuscates user-provided text. The application takes text input, processes it, and generates a downloadable JavaScript file. This JavaScript file contains an obfuscated form of the input text which is written to the document when executed in a browser.

## Features

- Web-based interface for user input
- Text obfuscation logic
- Generates and allows users to download obfuscated text as a JavaScript file

## Getting Started

### Prerequisites

- PHP 7.4 or higher
- A web server like Apache or Nginx
- A modern web browser

### Installation

1. Clone the repository.
    ```
    git clone https://github.com/your-username/HTML-obfuscator.git
    ```
2. Place the cloned repository inside the web server's document root directory.
3. Ensure the web server is running.
4. Access the application via a web browser by navigating to the appropriate URL, e.g., `http://localhost/HTML-obfuscator`.

## Usage

1. Once you access the application via your web browser, you will be presented with a text area where you can enter the text you want to obfuscate.
2. After entering your text, click the "Obfuscate Text" button.
3. The application will process the text and prompt you to download a JavaScript file.
4. You can then use this JavaScript file as needed.

## How It Works

The PHP script takes the input text and processes it by calculating Unicode code points and storing them in an array. It then generates a JavaScript array with the code points and a loop that iterates through the array, converting code points back to characters. Finally, the JavaScript writes the original text to the document.

## Contributing

Contributions are welcome! Feel free to submit issues or pull requests.

1. Fork the repository.
2. Create your feature branch (`git checkout -b feature/your-feature`).
3. Commit your changes (`git commit -am 'Add some feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Create a new pull request.

## License

This project is licensed under the MIT License. See the LICENSE file for details.

## Acknowledgments

- [Bootstrap](https://getbootstrap.com/): For the front-end framework.

## Disclaimer

Please note that this tool should not be used for securing sensitive data as the obfuscation method used is not cryptographically secure. It is meant for educational purposes and casual use.


This was all written in response to: https://stackoverflow.com/questions/32819322/javascript-obfuscation-algorithm

Response on stack overflow:

Hello Matt Watkins,

You are looking at an obfuscation algorithm that is based on converting characters into their numerical representation and storing them as integers in an array. The code you posted is decrypting this data and converting it back into a readable string. Here's how it works:

1. Each integer in the array `erp` is made up of four bytes, and each byte represents the ASCII value of one character.

2. In the loop, the code is dividing the integer by powers of 256 to get the individual bytes back. This is done by utilizing the bitwise layout of the 32-bit integer.

3. `Math.floor((tmp/Math.pow(256,3)))` is extracting the first (most significant) byte.

4. `Math.floor((tmp/Math.pow(256,2)))` is extracting the second byte.

5. `Math.floor((tmp/Math.pow(256,1)))` is extracting the third byte.

6. `Math.floor((tmp/Math.pow(256,0)))` is extracting the fourth (least significant) byte.

7. The `String.fromCharCode()` function is used to convert each byte back to a character based on ASCII values.

Now, for your question about the value `1111702575`. This can be explained as follows:

- 1111702575 is `0x42430A3C` in hexadecimal.
- This breaks down into the ASCII codes: `0x42` (`B`), `0x43` (`C`), `0x0A` (line feed), `0x3C` (`<`).

If you are looking to create obfuscation, you would need to do the reverse process: convert characters to ASCII codes, then combine them into 32-bit integers. Here is an example code to achieve that:

Decoding:
```javascript
var encodedArray = [1013988929, 1111702575, 28734]; // Declare an array with encoded values
var decodedString = ''; // Initialize an empty string to hold the decoded string

// Loop through each element in the encoded array
for (var i = 0; i < encodedArray.length; i++) {
    var value = encodedArray[i]; // Store the current encoded value in 'value'
    var decodedChunk = ''; // Initialize an empty string to hold the decoded chunk

    // Keep looping until 'value' becomes 0
    while (value > 0) {
        var charCode = value % 256; // Calculate the remainder when 'value' is divided by 256
        decodedChunk = String.fromCharCode(charCode) + decodedChunk; // Convert the remainder to a character and prepend it to 'decodedChunk'
        value = Math.floor(value / 256); // Divide 'value' by 256 and store the result back into 'value'
    }

    decodedString += decodedChunk; // Append the 'decodedChunk' to the 'decodedString'
}

console.log(decodedString); // Output the 'decodedString' to the console
```
Encoding:
```javascript
function encodeString(input) { // Define a function named 'encodeString' that takes an input string
    var encodedArray = []; // Initialize an empty array to hold the encoded values
    var currentChunk = 0; // Initialize a variable to accumulate the encoding of up to 4 characters
    var bytesInChunk = 0; // Initialize a variable to keep track of the number of characters in the current chunk

    // Loop through each character in the input string
    for (var i = 0; i < input.length; i++) {
        var charCode = input.charCodeAt(i); // Get the ASCII value of the current character

        currentChunk = currentChunk * 256 + charCode; // Multiply 'currentChunk' by 256 and add the ASCII value of the current character
        bytesInChunk++; // Increment the number of characters in the current chunk

        // Check if 'bytesInChunk' is equal to 4
        if (bytesInChunk === 4) {
            encodedArray.push(currentChunk); // Append 'currentChunk' to 'encodedArray'
            currentChunk = 0; // Reset 'currentChunk'
            bytesInChunk = 0; // Reset 'bytesInChunk'
        }
    }

    // Check if there are any characters left in 'currentChunk'
    if (bytesInChunk > 0) {
        encodedArray.push(currentChunk); // Append the remaining 'currentChunk' to 'encodedArray'
    }

    return encodedArray; // Return the 'encodedArray'
}

var inputString = '<p>ABC</p>'; // The string to be encoded
var encodedArray = encodeString(inputString); // Call 'encodeString' function with 'inputString' as an argument

console.log(encodedArray); // Output the 'encodedArray' to the console

```


It's important to note that the provided code is a simple and easily reversible obfuscation technique. It is not a strong security measure. For more robust obfuscation, advanced algorithms and transformations are used to make the code harder to understand and reverse engineer.

If you're interested in creating obfuscation techniques, there are libraries and tools available that provide more sophisticated and secure methods. These tools often offer various obfuscation transformations, including name mangling, code splitting, and control flow obfuscation, among others.

Remember that while obfuscation can make code more difficult to understand, it does not provide absolute security. Determined attackers can still reverse engineer obfuscated code given enough time and resources.

Github Example: 

All the best,

Austen
