# Toolbox

## `Doctrine\Collection\CollectionInterface`

Defines extra methods on top of the Doctrine default Collection.
Such as:

- `find(callable $callable): mixed`
  - Use a callable to find an element
- `findIndex(callable $callable): mixed`
  - Use a callable to find an element and return it's index
- `findAll(callable $callable): self`
  - Use a callable to find all matching elements
- `reduce(callable $callable, mixed $initial = null): mixed`
  - Use a callable to reduce the collection
- `sort(callable $callable): self`
  - Use a callable to sort the collection
- `join(string $separator, ?callable $callable = null): string`
  - Join all elements of the collection and return a string

## `Doctrine\Collection\CollectionTrait`

Implements all methods from CollectionInterface.

## `Doctrine\Collection\ArrayCollection`

Decorates Doctrine's ArrayCollection to add methods from the CollectionInterface.

## `Doctrine\Collection\DoctrineCollectionDecorator`

Decorates a Doctrine Collection to add methods from the CollectionInterface.

## `Doctrine\Repository\AbstractEntityRepository`

Encapsulates the Doctrine EntityRepository to create a clean interface.

## `Http\JsonResponseTrait`

Decorates an ResponseInterface object.

- `json(ResponseInterface $response, JsonSerializable|array $data, int $flags = JSON_PRETTY_PRINT, int $depth = 512): ResponseInterface`

## `Slim\SlimRouteArgumentTrait`

Adds a convenient way to get Slim route arguments:

- `getRouteArgumentValue(ServerRequestInterface $request, string $argumentName): ?string`