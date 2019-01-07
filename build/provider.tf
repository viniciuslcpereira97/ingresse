provider "aws" {
    access_key = "${var.credentials["access_key"]}"
    secret_key = "${var.credentials["secret_key"]}"
    region     = "sa-east-1"
}
