resource "aws_instance" "ingresse-api" {
    ami = "${var.ami["id"]}"
    instance_type= "${var.instance["type"]}"
}
