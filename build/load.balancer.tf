resource "aws_alb" "ingresse_api_alb" {
    name               = "${var.load_balancer["name"]}"
    load_balancer_type = "${var.load_balancer["type"]}"

    subnets = [
        "${aws_subnet.subnet_A.id}",
        "${aws_subnet.subnet_B.id}"
    ]

    security_groups = [
        "${aws_security_group.allow_http.id}"
    ]
}
