param(
    [switch]$Reset
)

if (Test-Path ".env") {
    Remove-Item ".env" -Force
}
Copy-Item ".env.example" ".env"

if ($Reset) {
    docker compose --profile dev down
}

docker compose --profile dev build
if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }
docker compose --profile dev pull --ignore-buildable
if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }

docker compose --profile dev up --watch
