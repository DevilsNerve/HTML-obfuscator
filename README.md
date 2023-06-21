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
