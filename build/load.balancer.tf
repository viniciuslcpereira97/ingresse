resource "aws_lb" "ingresse_api_lb" {
    name               = "${var.load_balancer["name"]}"
    load_balancer_type = "${var.load_balancer["type"]}"
    internal           = true

    subnets = [
        "subnet-4311e825",
        "subnet-59b57202"
    ]

    security_groups = [
        "${aws_security_group.allow_http.id}"
    ]
}
