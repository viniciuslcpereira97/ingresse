variable "credentials" {
    description = "aws credentials"
    type        = "map"
    
    default {
        access_key = "AWS ACCESS KEY"
        secret_key = "AWS SECRET KEY"
    }
}
