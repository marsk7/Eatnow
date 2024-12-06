<?= $this->extend('template') ?>
<?= $this->section('content') ?>

    <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Custom Chatbot Cuisine Recommend for <?= esc($user['username']) ?></h1>
                </div>
                <div>
                    <a href="https://platform.openai.com/docs/models/gpt-3-5-turbo" style="font-weight: bold; color: black; text-decoration: none;">OpenAI GPT-4o</a>
                </div>

                <div class="chat-container">
                    <div class="chat-message" id="chatContainer">
    
                    </div>

                    <form action="/item/generate-summary" method="post">
                        <div class="form-group mb-4">
                            <textarea class="form-control" id="response" rows="5" placeholder="Enter your response here ..."></textarea>
                        </div>
                        <button class="btn btn-primary" type="button" id="sendButton">Send</button>
                    </form>
                </div>

            </div>
    </section>

    <!-- Bot message template -->
    <template id="botMessageTemplate">
        <div>
            <div class="bot-profile">
                <div class="bot-name">Restaurant Main Chef</div>
            </div>
            <div class="bot-message-text"></div>
        </div>
    </template>

    <!-- User message template -->
    <template id="userMessageTemplate">
        <div>
            <div class="user-profile">
                <div class="user-name"><?= $user['username'] ?></div>
            </div>
            <div class="message-text"></div>
        </div>
    </template>


    <script>
        // Message history array
        let messageHistory = [];

        // Function to create a new chat message element using templates
        function createChatMessage(message, isUser) {
            const template = isUser ? document.getElementById('userMessageTemplate') : document.getElementById('botMessageTemplate');
            const chatMessage = template.content.cloneNode(true);
            
            const messageText = chatMessage.querySelector(isUser ? '.message-text' : '.bot-message-text');
            messageText.textContent = message;

            return chatMessage;
        }

        // Function to add a new message to the chat
        function addMessage(message, isUser) {
            const chatMessage = createChatMessage(message, isUser);
            const chatContainer = document.getElementById('chatContainer');
            chatContainer.appendChild(chatMessage);
            chatContainer.scrollTop = chatContainer.scrollHeight;

            // Add the message to the message history
            messageHistory.push({
                role: isUser ? 'user' : 'assistant',
                content: message
            });

            console.log(messageHistory);
        }

        // Function to send a message to the server and get the bot's response
        function sendMessage(message) {
            return fetch('<?= base_url("chatbot"); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(messageHistory)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                return data.message;
            });
        }

        // Event listener for the send button click
        document.getElementById('sendButton').addEventListener('click', function() {
            const messageInput = document.getElementById('response');
            const message = messageInput.value.trim();

            if (message !== '') {
                addMessage(message, true);
                messageInput.value = '';

                sendMessage(message)
                    .then(botResponse => {
                        addMessage(botResponse, false);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });

        prompt = "Imagine you are an experienced restaurant chef. Based on the users name: <?= $user['username'] ?>, ask a common question. Recommond delicious dishes."
        
        addMessage(prompt, true);

        sendMessage(prompt).then(botResponse => {
                        addMessage(botResponse, false);
                    })
    </script>

    <style>
        .chat-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 10px;
        }
        .chat-message {
            margin-bottom: 20px;
        }
        .chat-message .bot-profile {
            display: flex;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .chat-message .user-profile .user-name {
            font-weight: bold;
        }
        .chat-message .message-text {
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .chat-message .bot-message-text {
            background-color: #c0ffee;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .chat-message .user-profile {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .chat-message .bot-profile .bot-name {
            font-weight: bold;
            margin-right: 10px;
        }
    </style>
<?= $this->endSection() ?>
