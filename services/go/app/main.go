package main

import (
	"fmt"
	"net/http"
)

func handler(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintln(w, "Hello, Dockerized Go App!")
}

func main() {
	fmt.Println("Server is running on port 8080...")
	http.HandleFunc("/", handler)
	http.ListenAndServe(":8080", nil) // サーバーをポート8080で起動
}
