#!/bin/bash

KEY_NAME="id_ed25519"
KEY_DIR="$HOME/.ssh"
KEY_PATH="$KEY_DIR/$KEY_NAME"

mkdir -p "$KEY_DIR"
chmod 700 "$KEY_DIR"

if [ -f "$KEY_PATH" ]; then
    echo "❗ Key already exists: $KEY_PATH"
    exit 1
fi

ssh-keygen -t ed25519 -C "your_email@example.com" -f "$KEY_PATH" -N ""

echo "🔑 Public key:"
cat "${KEY_PATH}.pub"