#!/bin/bash

BASE_URL="http://localhost:8100/api"

echo "======================================"
echo "  Testing Laravel API Endpoints"
echo "======================================"
echo ""

echo "1. Creating Authors..."
curl -s -X POST ${BASE_URL}/authors | python3 -m json.tool || echo "Failed"
echo -e "\n"

echo "2. Creating Articles..."
curl -s -X POST ${BASE_URL}/articles | python3 -m json.tool || echo "Failed"
echo -e "\n"

echo "3. Creating Audiences..."
curl -s -X POST ${BASE_URL}/audiences | python3 -m json.tool || echo "Failed"
echo -e "\n"

echo "4. Subscribing Audiences to Articles..."
curl -s -X POST ${BASE_URL}/subscribe | python3 -m json.tool || echo "Failed"
echo -e "\n"

echo "5. Creating Comments..."
curl -s -X POST ${BASE_URL}/comments | python3 -m json.tool || echo "Failed"
echo -e "\n"

echo "======================================"
echo "  Testing Query Endpoints"
echo "======================================"
echo ""

echo "6. Get articles of author Sao..."
curl -s -X GET ${BASE_URL}/query/author-sao-articles | python3 -m json.tool || echo "Failed"
echo -e "\n"

echo "7. Get audiences of article 'Climate changes in the last 3 years'..."
curl -s -X GET ${BASE_URL}/query/article-audiences | python3 -m json.tool || echo "Failed"
echo -e "\n"

echo "8. Get audiences of author Sok..."
curl -s -X GET ${BASE_URL}/query/author-sok-audiences | python3 -m json.tool || echo "Failed"
echo -e "\n"

echo "9. Get comments of audience Samnang..."
curl -s -X GET ${BASE_URL}/query/samnang-comments | python3 -m json.tool || echo "Failed"
echo -e "\n"

echo "10. Get all comments with their topic..."
curl -s -X GET ${BASE_URL}/query/comments-with-topic | python3 -m json.tool || echo "Failed"
echo -e "\n"

echo "======================================"
echo "  Testing Complete!"
echo "======================================"
