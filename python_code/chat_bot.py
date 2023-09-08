import nltk

def generate_response(user_message):
    # Use NLTK to tokenize the user message
    tokens = nltk.word_tokenize(user_message)

    # Check if the user message contains a keyword
    if 'help' in tokens:
        return "How can I help you?"
    elif 'greeting' in tokens:
        return "Hello! How are you doing today?"
    else:
        return "I'm sorry, I didn't understand what you said."

# Example usage
user_message = "Can you help me with something?"
bot_response = generate_response(user_message)
print(bot_response)
